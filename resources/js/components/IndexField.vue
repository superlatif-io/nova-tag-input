<template>
    <div v-html="html"></div>
</template>

<script>
    let vm;

    export default {
        data() {
            return {
                tags: '',
                html: '',
                tagsWrapperClass: 'nti-tags-wrapper',
                tagClass: 'nti-tag',
            }
        },
        props: ['resourceName', 'field'],
        mounted() {
            vm = this;
            this.newField = this.field;

            if (this.field.value) {
                let items = this.field.value;
                items.forEach(function (item, index) {
                    vm.tags += '<span class="' + vm.tagClass + '">' + item.text + '</span>';
                });

                this.html = '<div class="' + this.tagsWrapperClass + '">' + vm.tags + '</div>';
            }
        }
    }
</script>
