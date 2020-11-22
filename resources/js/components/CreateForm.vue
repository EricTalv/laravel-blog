<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="title"><h4>Title</h4></label>
            <input
                class="form-control  "
                type="text"
                name="title"
                id="title"
                value=""
                v-model="fields.title"
            >
            <div v-if="errors && errors.name" class="text-danger">{{ errors.title[0] }}</div>
        </div>

        <div class="form-group">
            <label for="excerpt"><h4>Excerpt</h4></label>
            <textarea
                class="form-control "
                name="excerpt"
                rows="2"
                id="excerpt"> </textarea>
        </div>
        <div class="form-group">
            <label for="body"><h4>Body</h4></label>
            <textarea
                class="form-control"
                name="body"
                rows="3"
                id="body"></textarea>

        </div>
        <div class="form-group">
            <label for="tagger"><h4>Tags</h4></label>
            <tag-input id="tagger"></tag-input>

        </div>

        <button type="submit" class="btn btn-primary btn-lg">Submit</button>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                fields: {},
                errors: {},
            }
        },
        methods: {
            submit() {
                this.errors = {};

                axios.put('/article/create', this.fields).then(response => {
                    console.log('Article Sent');
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            },
        },
    }
</script>
