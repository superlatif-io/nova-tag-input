Nova.booting((Vue) => {
    window.Vue.use = Vue.use;
    Vue.component('index-nova-tag-input', require('./components/IndexField').default)
    Vue.component('detail-nova-tag-input', require('./components/DetailField').default)
    Vue.component('form-nova-tag-input', require('./components/FormField').default)
})
