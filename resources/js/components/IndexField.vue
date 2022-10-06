<template>
    <div v-html="fieldLabel"></div>
</template>

<script>
    let vm;

    export default {
        data() {
            return {
                tags: '',
                fieldLabel: '',
                tagsWrapperClass: 'nti-tags-wrapper nti-tags-wrapper-index',
                tagClass: 'nti-tag',
            }
        },
        props: ['resourceName', 'field'],
        mounted() {
            vm = this;
            this.newField = this.field;
            let items = this.field.value || this.field.displayedAs;

            if (items) {
                items.forEach(function (item, index) {
                    // Backward compatibility in case tags are stored as object
                    let label = (typeof item === "object" && item.hasOwnProperty('text')) ? item.text : item;
                    vm.tags += '<span class="' + vm.tagClass + '">' + label + '</span>';
                });

                this.fieldLabel = '<div class="' + this.tagsWrapperClass + '">' + vm.tags + '</div>';
            }
        }
    }
</script>
