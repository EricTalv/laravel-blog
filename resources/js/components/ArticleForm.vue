<template>
    <div class="row">
        <div class="col-6">
            <small>Create an Article</small>
            <hr>
            <form @submit.prevent="submit" novalidate>

                <div class="form-group" :class="{ 'form-group--error': $v.fields.title.$error }">
                    <label class="form__label" for="title"><h3>Title</h3></label>
                    <input
                        class="form-control form__input"
                        type="text"
                        name="title"
                        id="title"
                        value=""
                        v-model="$v.fields.title.$model"
                        :class="status($v.fields.title)"
                        placeholder="Title.."
                    />
                    <div class="error" v-if="$v.fields.title.$dirty && $v.fields.title.$error"><small>Title is required</small></div>
                </div>

                <div class="form-group" :class="{ 'form-group--error': $v.fields.excerpt.$error }">
                    <label for="excerpt"><h3>Excerpt</h3></label>
                    <textarea
                        class="form-control "
                        name="excerpt"
                        rows="2"
                        id="excerpt"
                        v-model="$v.fields.excerpt.$model"
                        :class="status($v.fields.excerpt)"
                        placeholder="Excerpt.."

                    > </textarea>
                    <div class="error" v-if="$v.fields.excerpt.$dirty && $v.fields.excerpt.$error"><small>Excerpt is required</small></div>
                </div>
                <div class="form-group" :class="{ 'form-group--error': $v.fields.body.$error }">
                    <label for="body"><h3>Body</h3></label>
                    <textarea
                        class="form-control"
                        name="body"
                        rows="3"
                        id="body"
                        v-model="$v.fields.body.$model"
                        :class="status($v.fields.body)"
                        placeholder="Body.."

                    ></textarea>
                <div class="error" v-if="$v.fields.body.$dirty && $v.fields.body.$error"><small>Body is required</small></div>

                </div>
                <div class="form-group">
                    <label for="tagger"><h3>Tags</h3></label>
                    <tag-input id="tagger" :editDataTags="editDataTags" @updatetags="getTags"></tag-input>
                    <small class="text-muted">Write something and press enter.</small>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" :disabled="submitStatus === 'PENDING'">Submit</button>
                <p class="text-success my-2" v-if="submitStatus === 'OK'">Thanks for your submission!</p>
                <p class="text-danger my-2" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
                <p class="text-warning my-2" v-if="submitStatus === 'PENDING'">Sending...</p>

                <hr>
                <div class="alert alert-success" role="alert" v-if="createdArticle">
                    <h4 class="alert-heading">Article <b>"{{ createdArticle.title }}"</b> Created!</h4>
                    <p>You have successfully made an article.</p>
                    <hr>
                    <a target="_blank" v-bind:href="'/articles/' + createdArticle.id">Check it out here</a>
                </div>
                <div class="alert alert-success" role="alert" v-if="updatedArticle">
                    <h4 class="alert-heading">Article <b>"{{ updatedArticle.title }}"</b> Updated!</h4>
                    <p>You have successfully Updated the article.</p>
                    <hr>
                    <a target="_blank" v-bind:href="'/articles/' + updatedArticle.id">Check it out here</a>
                </div>
            </form>
        </div>
        <div class="col-6">
            <small>Article Preview</small>
            <hr>
            <div class="bg-white p-2 rounded border border-light">
                <div class="title">
                    <small class="text-muted">{{ this.articleDateTime.date }}</small>
                    <h4>
                    <span
                        class="text-capitalize font-weight-bold">
                          <h3>{{ fields.title ? fields.title : 'Title' }}
                            <a
                              class="badge badge-pill badge-light float-right mr-5 font-italic text-muted"
                              style="font-size: 1rem;">{{ this.$userName }}</a></h3>
                    </span>
                    </h4>
                </div>
                <div class="prev">
                    <span>{{ fields.excerpt ? fields.excerpt : 'Excerpt' }}</span>
                </div>
                <div class="prev">
                    <span>{{ fields.body ? fields.body : 'Body' }}</span>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {required} from 'vuelidate/lib/validators';
    import moment from 'moment';

    export default {
        props: {
            editData: {
                type: Object,
            },
            editDataTags: {type: Array},
        },

        data() {
            return {
                fields: {
                    title: '',
                    excerpt: '',
                    body: '',

                },
                submitStatus: null,
                errors: {},
                createdArticle: null,
                updatedArticle: null,
                articleDateTime: {
                    date: '',
                },
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

                // Check Validations
                this.$v.$touch();
                // Check invalidity
                if (this.$v.$invalid) {
                    this.submitStatus = 'ERROR'
                } else {
                    this.submitStatus = 'PENDING'
                    // Check if this is an EDIT request or a CREATE request
                    // EDIT REQUEST
                    if (this.editData) {
                        axios.put('/articles/' + this.editData.id, this.fields)
                            .then(response => {
                                this.submitStatus = 'SUCCESS'
                                this.updatedArticle = response.data;
                            }).catch(error => {
                                this.submitStatus = 'ERROR'
                                this.errors = error.response.data.errors;
                        });
                        // CREATE REQUEST
                    } else {
                        axios.put('/article/create', this.fields)
                            .then(response => {
                                this.submitStatus = 'SUCCESS'
                                this.createdArticle = response.data;
                            }).catch(error => {
                                this.submitStatus = 'ERROR'
                                this.errors = error.response.data.errors;
                        });
                    }
                }
            },
        },

        /*
         * If we get any data
         * switch to edit mode
         */
        created: function () {

            if (this.editData) {
                this.fields.title = this.editData.title
                this.fields.excerpt = this.editData.excerpt
                this.fields.body = this.editData.body

                this.articleDateTime.date = moment(this.editData.created_at).format('Do.MMM.YYYY')
            } else {
                this.articleDateTime.date = moment().format('D MMM, YYYY');
            }
        },
    }
</script>


<style scoped>

    .invalid-feedback {
        display: block;
    }

    input {
        border: 1px solid silver;
        border-radius: 4px;
        background: white;
        padding: 5px 10px;
    }

    .dirty {
        border-color: #6eb86e;
    }

    .dirty:focus {
        outline-color: #8E8;
    }

    .error {
        border-color: red;
        color: #f54747;
    }

    .error:focus {
        outline-color: #F99;
    }

</style>
