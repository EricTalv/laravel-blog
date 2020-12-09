<template>
    <div class="row">
        <div class="col-6">
            <small>Create an Article</small>
            <hr>
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
                        placeholder="Title.."
                    />
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
                        placeholder="Excerpt.."

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
                        placeholder="Body.."

                    ></textarea>
                    <div v-if="errors && errors.body" class="invalid-feedback">{{ errors.body[0] }}</div>

                </div>
                <div class="form-group">
                    <label for="tagger"><h4>Tags</h4></label>
                    <tag-input id="tagger" :editDataTags="editDataTags" @updatetags="getTags"></tag-input>
                    <small class="text-muted">Write something and press enter.</small>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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
            <div class="title">
                <h4>
                    <span v-if="fields.title" class="text-capitalize">{{ fields.title }}</span>
                    <span v-else>Article Title</span>
                    <small>| {{ this.articleDateTime.date  }}</small>
                </h4>
            </div>
            <div class="prev">
                <span v-if="fields.excerpt" >{{ fields.excerpt }}</span>
                <span v-else>Article excerpt</span>
            </div>
            <div class="prev">
                <span v-if="fields.body">{{ fields.body }}</span>
                <span v-else>Article body</span>
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

            if (this.editData) {
                axios.put('/articles/' + this.editData.id, this.fields)
                    .then(response => {
                        this.updatedArticle = response.data;
                    }).catch(error => {
                    this.errors = error.response.data.errors;
                });
            } else {
                axios.put('/article/create', this.fields)
                    .then(response => {
                        this.createdArticle = response.data;
                    }).catch(error => {
                    this.errors = error.response.data.errors;
                });
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
        }
        else {
            this.articleDateTime.date = moment().format('Do.MMM.YYYY');
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
