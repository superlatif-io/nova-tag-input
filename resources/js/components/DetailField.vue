<template>
    <panel-item :field="fieldLabel" />
</template>

<script>
    let vm;

    export default {
        data() {
            return {
                tags: '',
                fieldLabel: {},
                tagsWrapperClass: 'nti-tags-wrapper',
                tagClass: 'nti-tag',
            }
        },
        props: ['resource', 'resourceName', 'resourceId', 'field'],
        mounted() {
            vm = this;
            this.fieldLabel = this.field;

            if (this.field.value) {
                let items = this.field.value;
                items.forEach(function (item, index) {
                    // Backward compatibility in case tags are stored as object
                    let label = (typeof item === "object" && item.hasOwnProperty('text')) ? item.text : item;
                    vm.tags += '<span class="' + vm.tagClass + '">' + label + '</span>';
                });

                this.fieldLabel.value = '<div class="' + this.tagsWrapperClass + '">' + this.tags + '</div>';
                this.fieldLabel.asHtml = true; // displays as html in the PanelItem component
            }
        }
    }
</script>
