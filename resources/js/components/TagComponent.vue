<template>
    <input-tags v-model="tags">
        <div class="tags-input"
             slot-scope="{tag,removeTag,inputEventHandlers,inputBindings }">
            <span v-for="tag in tags"
                  class="tags-input-tag">
              <span>{{ tag }}</span>
              <button type="button" class="tags-input-remove"
                      v-on:click="removeTag(tag)"
              >&times;
             </button>
            </span>
            <input
                class="tags-input-text"  placeholder="Add tag..."
                v-on="inputEventHandlers"
                v-bind="inputBindings"
            >
        </div>
    </input-tags>
</template>


<script>
    export default {

        data() {
            return {
                tags: [
                    'Laravel',
                    'VueJs'
                ]
            }
        },
    }
</script>
