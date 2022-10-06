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
            this.fieldLabel = { ...this.field };
            let items = this.fieldLabel.value || this.fieldLabel.displayedAs;

            if (items instanceof Array && items.length) {
                items.forEach(function (item, index) {
                    // Backward compatibility in case tags are stored as object
                    let label = (typeof item === "object" && item.hasOwnProperty('text')) ? item.text : item;
                    vm.tags += '<span class="' + vm.tagClass + '">' + label + '</span>';
                });

                this.fieldLabel.value = '<div class="' + this.tagsWrapperClass + '">' + this.tags + '</div>';
                this.fieldLabel.displayedAs = this.field.value;
                this.fieldLabel.asHtml = true; // displays as html in the PanelItem component
            } else {
                this.fieldLabel.displayedAs = this.fieldLabel.displayedAs || '—';
            }
        }
    }
</script>
