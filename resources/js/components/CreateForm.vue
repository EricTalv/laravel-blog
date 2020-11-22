<template>
    <form @submit.prevent="submit" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="title"><h4>Title</h4></label>
            <input
                class="form-control"
                :class="{ 'is-invalid': errors.title  }"
                type="text"
                name="title"
                id="title"
                value=""
                v-model="fields.title"
            >
            <div v-if="errors && errors.title" class="invalid-feedback">{{ errors.title[0] }}</div>
        </div>

        <div class="form-group">
            <label for="excerpt"><h4>Excerpt</h4></label>
            <textarea
                class="form-control "
                :class="{ 'is-invalid': errors.excerpt  }"
                name="excerpt"
                rows="2"
                id="excerpt"
                v-model="fields.excerpt"> </textarea>
            <div v-if="errors && errors.excerpt" class="invalid-feedback">{{ errors.excerpt[0] }}</div>
        </div>
        <div class="form-group">
            <label for="body"><h4>Body</h4></label>
            <textarea
                class="form-control"
                :class="{ 'is-invalid': errors.body  }"
                name="body"
                rows="3"
                id="body"
                v-model="fields.body"></textarea>
            <div v-if="errors && errors.body" class="invalid-feedback">{{ errors.body[0] }}</div>

        </div>
        <div class="form-group">
            <label for="tagger"><h4>Tags</h4></label>
            <tag-input id="tagger" @update="onTagUpdate" ></tag-input>

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
            onTagUpdate (newValue) {
                this.fields.tags = newValue
            },

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
