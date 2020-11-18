<template>

<div class="tags-input-container">

    <!--
      For each Tag inside of Tags
      write it out
    -->
    <div
        class="tag"
        v-for="(tag, index) in tags"
        :key="'tag' + index"
    >
        {{ tag }}
    </div>

    <!--    Call addTag method on enter key up-->
    <input class="tag-input" v-model="tagValue" @keyup.enter="addTag()" />
    <button v-on:click="test()">Say hi</button>
</div>

</template>


<script>
    export default {

        data() {
            return {
                tagValue: '',
                tags: [ 'hello' ]
            }
        },

        methods: {

            addTag() {
                // If the Input contains data, add it to the list as
                // a new tag
                if(!this.tagValue == '') {
                    this.tags.push(this.tagValue);
                }
                this.tagValue ='';

                console.log('Added Tag');

            },

            test() {
                console.log('this is from test func');
            }
        },

        mounted()  {
            console.log('Tag input component Mounted');
            this.test();
        }

    }
</script>

<style lang="scss" scoped>
    .tags-input-container {
        width: 100%;
        padding: 10px;
    }

    .tag-input {
        width: 100%;
        padding: 0;
        margin: 0;
        border: 1px solid grey;
        outline: none;
    }

    .tag {
        float: left;
        padding: 3px 5px;

        &:hover {
            color: #0073ff;
        }
    }


</style>
