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

                    v-model="$v.fields.excerpt.$model"
                    :class="status($v.fields.excerpt)"

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


                    v-model="$v.fields.body.$model"
                    :class="status($v.fields.body)"

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
                <h4 class="alert-heading">Article <b>"{{ createdArticle.title }}"</b> Created!</h4>
                <p>You have successfully made an article.</p>
                <hr>
                <a target="_blank" v-bind:href="'/articles/' + createdArticle.id">Check it out here</a>
            </div>
        </form>
</template>

<script>

    import { required } from 'vuelidate/lib/validators';

    export default {
        props: ['editData'],

        data() {
            return {
                fields: {
                    title: '',
                    excerpt: '',
                    body: '',
                },
                errors: {},
                createdArticle: null,
                editMode: false,

            }
        },

        validations: {
            fields: {
                title: {
                    required,
                },
                excerpt: {
                    required,
                },
                body: {
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
                        this.createdArticle = response.data;
                    }).catch(error => {
                    this.errors = error.response.data.errors;

                    console.log(this.errors)
                });
            },
        },

        computed: {
            /*
               * If we get any data
               * switch to edit mode
            */
            checkEditMode() {

            }
        }


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
