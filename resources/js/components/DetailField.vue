<template>
    <panel-item :field="newField" />
</template>

<script>
    let vm;

    export default {
        data() {
            return {
                tags: '',
                newField: {},
                tagsWrapperClass: 'nti-tags-wrapper',
                tagClass: 'nti-tag',
            }
        },
        props: ['resource', 'resourceName', 'resourceId', 'field'],
        mounted() {
            vm = this;
            this.newField = this.field;

            if (this.field.value) {
                let items = this.field.value;
                items.forEach(function (item, index) {
                    vm.tags += '<span class="' + vm.tagClass + '">' + item.text + '</span>';
                });

                this.newField.value = '<div class="' + this.tagsWrapperClass + '">' + vm.tags + '</div>';
                this.newField.asHtml = true; // displays as html in the PanelItem component
            }
        }
    }
</script>
