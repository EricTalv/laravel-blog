<template>

<div class="tags-input-container">
    <div
        class="tag"
        v-for="(tag, index) in tags"
        :key="'tag' + index"
    >
        {{ tag }}
    </div>

    <input class="tag-input" v-model="tagValue" />
</div>

</template>


<script>
    export default {

        data() {
            return {
                tagValue: '',
                tags: []
            }
        },
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
</style>
