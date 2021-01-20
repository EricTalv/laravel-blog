<template>
    <input-tags v-model="tags">
        <div class="tags-input"
             slot-scope="{tag,removeTag,inputEventHandlers,inputBindings }">
            <span v-for="tag in tags"
                  class="tag ">
              <span class="m-1">{{ tag }}</span>
              <button type="button" class="tag-remove"
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
                tags: [],
            }
        },
        // Fetch existing tags from
        props: ['editDataTags'],

        mounted() {
            // Find out if we have any existing data
            if( this.editDataTags ) {
                for(let tag of this.editDataTags) {
                    this.tags.push(tag.name)
                }

                this.$emit('updatetags', this.tags)
            }
        },

        watch: {
            // When a tag is added or removed, Emit the tag to parent container
            tags: function (value) {
                this.$emit('updatetags', value)
            }
        }


    }
</script>


<style lang="scss" scoped>

    .tags-input {
        display:flex;
        flex-wrap: wrap;
    }

    .tag {
        background-color: #03a5fc;
        color: white;
        border-radius: 5px;
        padding: 2px;
        margin: 2px;
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
