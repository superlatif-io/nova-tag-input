<template>
    <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
        <template slot="field">
            <vue-tags-input v-model="tag" :tags="tags" @tags-changed="tagsChanged"
                            :placeholder="field.placeholder"
                            :autocompleteItems="filteredItems"
                            :add-on-key="field.addOnKeys"
                            :separators="field.separators"
                            :add-from-paste="field.addFromPaste"
                            :add-on-blur="field.addOnBlur"
                            :add-only-from-autocomplete="field.addOnlyFromAutocomplete"
                            :allow-edit-tags="field.allowEditTags"
                            :autocomplete-always-open="field.autocompleteAlwaysOpen"
                            :autocomplete-filter-duplicates="field.autocompleteFilterDuplicates"
                            :autocomplete-min-length="field.autocompleteMinLength"
                            :avoid-adding-duplicates="field.avoidAddingDuplicates"
                            :delete-on-backspace="field.deleteOnBackspace"
                            :disabled="field.disabled"
                            :max-tags="field.maxTags"
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
            tags: [],
            autocompleteItems: [],
            showHelpText: true,
        }
    },
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    mounted() {
        // Set up default parameters
        this.autocompleteItems = (this.field.autocompleteItems) ? this.field.autocompleteItems : this.autocompleteItems;
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || '';
            if (this.value !== '') {
                let tags = [];
                this.value.forEach(function (item, index) {
                    // Check if the data needs conversion
                    tags.push((typeof item === "object" && item.hasOwnProperty('text')) ? item : {'text': item});
                });
                // Store the tags array
                this.tags = tags;
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
            return this.autocompleteItems.filter(i => {
                return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
            });
        },
    },

    components: { VueTagsInput }
}
</script>
