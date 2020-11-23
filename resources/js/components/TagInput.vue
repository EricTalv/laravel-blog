<template>
    <input-tags v-model="tags">
        <div class="tags-input"
             slot-scope="{tag,removeTag,inputEventHandlers,inputBindings }">
            <span v-for="tag in tags"
                  class="tag">
              <span>{{ tag }}</span>
              <button type="button" class="tag-remove"
                      v-on:click="removeTag(tag)"
              >&times;
             </button>
            </span>
            <input
                class="tags-input"  placeholder="Add tag..."
                v-on="inputEventHandlers"
                v-bind="inputBindings"
                @keyup.enter="sendTags"
            >
        </div>
    </input-tags>
</template>
s
<script>
    export default {

        data() {
            return {
                tags: [],
            }
        },

        methods: {
            sendTags() {
                this.$emit('onTagUpdate', this.tags)
            }
        }


    }
</script>


<style lang="scss" scoped>
    .tag {
        background-color: #03a5fc;
        color: white;
        border-radius: 5px;
        padding: 5px;
        margin: 4px;
        font-size: 20px;
    }

    .tag-remove {
        border: 0;
        background-color: transparent;
        color: white;
        margin: 0;
        padding: 0;
    }

</style>
