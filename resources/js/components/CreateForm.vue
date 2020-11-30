<template>

        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="title"><h4>Title</h4></label>
                <input
                    class="form-control"
                    type="text"
                    name="title"
                    id="title"
                    value=""

                    v-model="$v.fields.title.$model"
                    :class="status($v.fields.title)"

                />
                <!--
                 :class="{ 'is-invalid': errors.title  }"
                 v-model="fields.title"
                  -->
                <div v-if=" errors.title" class="invalid-feedback">{{ errors.title[0] }}</div>
            </div>

            <div class="form-group">
                <label for="excerpt"><h4>Excerpt</h4></label>
                <textarea
                    class="form-control "
                    name="excerpt"
                    rows="2"
                    id="excerpt"

                    :class="{ 'is-invalid': errors.excerpt  }"
                    v-model="fields.excerpt"

                > </textarea>
                <div v-if="errors && errors.excerpt" class="invalid-feedback">{{ errors.excerpt[0] }}</div>
            </div>
            <div class="form-group">
                <label for="body"><h4>Body</h4></label>
                <textarea
                    class="form-control"
                    name="body"
                    rows="3"
                    id="body"
                    :class="{ 'is-invalid': errors.body  }"
                    v-model="fields.body"
                ></textarea>
                <div v-if="errors && errors.body" class="invalid-feedback">{{ errors.body[0] }}</div>

            </div>
            <div class="form-group">
                <label for="tagger"><h4>Tags</h4></label>
                <tag-input id="tagger" @updatetags="getTags"></tag-input>

            </div>


            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            <hr>
            <div class="alert alert-success" role="alert" v-if="createdArticle">
                <h4 class="alert-heading">Article Created!</h4>
                <p>You have successfully made an article.</p>
                <hr>
                <a v-bind:href="'/articles/' + createdArticle">Check it out here</a>
            </div>
        </form>
</template>

<script>

    import { required } from 'vuelidate/lib/validators';

    export default {
        data() {
            return {
                fields: {},
                errors: {},
                createdArticle: 0,
                fieldsDataExists: false,


            }
        },

        validations: {
            fields: {
                title: {
                    required,
                }
            }
        },

        methods: {
            status(validation) {
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            },

            getTags(value) {
                this.$set(this.fields, 'tags', value)

            },

            submit() {
                this.errors = {};

                axios.put('/article/create', this.fields)
                    .then(response => {
                        this.createdArticle = response.data
                    }).catch(error => {
                    this.errors = error.response.data.errors;

                    console.log(this.errors)
                });
            },
        },

        computed: {


           destroyFieldWhenEmpty() {
               if (this.fields.title === ''){
                   this.$delete(this.fields, 'title')
               }
               if (this.fields.excerpt === ''){
                   this.$delete(this.excerpt, 'excerpt')
               }
               if (this.fields.body === ''){
                   this.$delete(this.fields, 'body')
               }
               if (this.fields.tags === ''){
                   this.$delete(this.fields, 'tags')
               }
           }
        },

    }
</script>


<style scoped>
    input {
        border: 1px solid silver;
        border-radius: 4px;
        background: white;
        padding: 5px 10px;
    }

    .dirty {
        border-color: #5A5;
        background: #EFE;
    }

    .dirty:focus {
        outline-color: #8E8;
    }

    .error {
        border-color: red;
        background: #FDD;
    }

    .error:focus {
        outline-color: #F99;
    }

</style>
