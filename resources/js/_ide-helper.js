window.__ = function (key, replacements) {}

Vue.mixin({
  methods: {
    __(key, replacements) {
      return __(key, replacements)
    },
    logout() {},
    stopImpersonating() {}
  },
  data() {
    return {
      card: {
        width: 'String',
        height: 'String',
        component: 'String',
        prefixComponent: false,
        onlyOnDetail: false,
        link: 'String',
        heading: 'String',
        current: 'String',
      }
    }
  }
})
