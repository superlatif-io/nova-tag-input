<template>
    <panel-item :index="index" :field="fieldLabel" />
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
        props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
        mounted() {
            // define this, provides access to the scope inside the forEach
            vm = this;
            // clone the original field prop
            this.fieldLabel = { ...this.field };
            // set the label the same as the original field prop
            this.fieldLabel.name = this.field.name;
            // get the value array
            let items = this.field.value;
            if (items instanceof Array && items.length) {
                // loop through the tags
                items.forEach(function (item, index) {
                    // Backward compatibility in case tags are stored as object
                    let label = (typeof item === "object" && item.hasOwnProperty('text')) ? item.text : item;
                    vm.tags += '<span class="' + vm.tagClass + '">' + label + '</span>';
                });
                // wrap the value
                this.fieldLabel.value = '<div class="' + this.tagsWrapperClass + '">' + this.tags + '</div>';
                // set the label as html
                this.fieldLabel.asHtml = true;
            } else {
                this.fieldLabel.value = '—';
            }
        }
    }
</script>
