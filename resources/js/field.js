Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-tag-input', require('./components/IndexField'))
    Vue.component('detail-nova-tag-input', require('./components/DetailField'))
    Vue.component('form-nova-tag-input', require('./components/FormField'))
})
