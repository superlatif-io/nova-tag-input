<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <vue-tags-input v-model="tag" :tags="tags" @tags-changed="tagsChanged"
                            :add-on-key="field.addOnKeys"
                            :allow-edit-tags="field.allowEditTags"
                            :placeholder="field.placeholder"
                            :autocompleteItems="filteredItems"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import VueTagsInput from '@johmun/vue-tags-input';

export default {
    data() {
        return {
            tag: '',
            tags: []
        }
    },
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || '';
            if (this.value !== '') {
                this.tags = this.value;
            }
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, JSON.stringify(this.tags) || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },

        /**
         * Handles the tagChanged event
         * @param newTags
         */
        tagsChanged(newTags) {
            this.tags = newTags;
        }
    },

    computed: {
        filteredItems() {
            return this.field.autocompleteItems.filter(i => {
                return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
            });
        },
    },

    components: { VueTagsInput }
}
</script>
