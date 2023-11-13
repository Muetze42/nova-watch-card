<?php

namespace NormanHuth\NovaWatchCard;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laravel\Nova\Card;
use Laravel\Nova\Nova;

class NovaWatchCard extends Card
{
    /**
     * @var string
     */
    protected string $versionToCheck;

    /**
     * @var string
     */
    protected string $cardCacheStore = 'file';

    /**
     * @var string
     */
    protected string $cardCacheKey = 'nova-watch-card';

    /**
     * @var int
     */
    protected int $cardCacheSeconds = 60;

    public function __construct($version = null)
    {
        $versionToCheck = $version ?: Nova::version();
        $this->versionToCheck = preg_replace('/[^0-9.]/', '', $versionToCheck);

        parent::__construct();
    }

    /**
     * @param string  $project
     *
     * @return \NormanHuth\NovaWatchCard\NovaWatchCard
     */
    public function setHeading(string $project): static
    {
        $this->withMeta(['heading' => $project]);

        return $this;
    }

    /**
     * @param string  $cardCacheStore
     *
     * @return \NormanHuth\NovaWatchCard\NovaWatchCard
     */
    public function setCardCacheStore(string $cardCacheStore): static
    {
        $this->cardCacheStore = $cardCacheStore;

        return $this;
    }

    /**
     * @param string  $cardCacheKey
     *
     * @return \NormanHuth\NovaWatchCard\NovaWatchCard
     */
    public function setCardCacheKey(string $cardCacheKey): static
    {
        $this->cardCacheKey = $cardCacheKey;

        return $this;
    }

    /**
     * @param int  $cardCacheSeconds
     *
     * @return \NormanHuth\NovaWatchCard\NovaWatchCard
     */
    public function setCardCacheSeconds(int $cardCacheSeconds): static
    {
        $this->cardCacheSeconds = $cardCacheSeconds;

        return $this;
    }

    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @return void
     */
    protected function fetchCompareData(): void
    {
        $data = Cache::store($this->cardCacheStore)
            ->get($this->cardCacheKey . '-' . $this->versionToCheck);

        if (!$data) {
            $response = Http::get('https://novawat.ch/api/update-check/' . $this->versionToCheck);

            if ($response->status() == 200) {
                $data = [
                    'current' => $response->json('current'),
                    'link' => $response->json('compare'),
                ];

                Cache::store($this->cardCacheStore)
                    ->set($this->cardCacheKey . '-' . $this->versionToCheck, $data, $this->cardCacheSeconds);
            }
        }

        $this->withMeta((array) $data);
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $this->fetchCompareData();

        return parent::jsonSerialize();
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component(): string
    {
        return 'nova-watch-card';
    }
}
