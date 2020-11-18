<template>
    <input-tags v-model="tags">
        <div class="tags-input"
             slot-scope="{tag,removeTag,inputEventHandlers,inputBindings }">
            <span v-for="tag in tags"
                  class="tag badge-secondary">
              <span>{{ tag }}</span>
              <button type="button" class="tag-remove badge badge-light"
                      v-on:click="removeTag(tag)"
              >&times;
             </button>
            </span>
            <input
                class="tags-input"  placeholder="Add tag..."
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
                tags: ['Laravel','Vuejs'],
            }
        }
    }
</script>


<style lang="scss" scoped>



</style>
