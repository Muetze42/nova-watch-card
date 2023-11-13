<template>
  <Card class="flex flex-col gap-2 items-center justify-center">
    <h1 v-if="card.heading" class="font-normal text-xl">
      {{ card.heading }}
    </h1>
    <div v-if="card.current">
      {{ __('Laravel Nova :version available', {version: card.current}) }}
    </div>
    <div v-if="card.link">
      <a
        :href="card.link"
        target="card"
        rel="noopener"
        class="border inline-flex items-center justify-center appearance-none cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 relative disabled:cursor-not-allowed shadow h-9 px-3 bg-primary-500 border-primary-500 hover:enabled:bg-primary-400 hover:enabled:border-primary-400 text-white dark:text-gray-900"
      >
        {{ __('Compare versions') }}
      </a>
    </div>
    <div v-if="!card.link" class="font-medium text-lg">
      {{ __('Laravel Nova is up to date') }}
    </div>
  </Card>
</template>

<script>
export default {
  props: [
    'card',
  ],
}
</script>
