<template>


    <div class="container">

        <div class="page-title">
            Create new post
        </div>

        <div class="post-form-container">

            <form
                id="newPostForm"
                v-on:submit.prevent="collectFormData"
            >
                <div class="post-form" >

                    <div class="post-form__group-title">Wtire post title</div>
                    <div class="post-form__group">
                        <input
                            v-model="title"
                            type="text"
                            name="title"
                            class="post-form__group-input"
                            align="bottom"
                        required/>

                        <label class="post-form__group-label">Title</label>
                    </div>

                    <br>
                    <div class="post-form__group-title">Enter main text</div>
                    <ckeditor
                            :editor="editor"
                            v-model="mainText"
                    ></ckeditor>
                    <br>

                    <div class="post-form__group-title">Select categories</div>
                    <multiselect
                            placeholder="Select categories"
                            v-model="postCategories"
                            label="name"
                            track-by="name"
                            :multiple="true"
                            :options="options">
                    </multiselect>

                    <br><br><br>

                    <div class="upload-image">
                        <div class="upload-image__container">
                            <div v-for="img in uploadImages" class="upload-image__item">
                                <img v-bind:src="img" alt="" width="200">
                            </div>
                        </div>

                        <br><br>

                        <div class="upload-image__btn">
                            <button onclick="document.getElementById('getFile').click()">Upload Post Image</button>
                            <input type='file' id="getFile" style="display:none" accept=".jpg, .jpeg, .png" @change="onFileChanged">
                        </div>
<!--
                        <input type="file" @change="onFileChanged" multiple>
-->
                    </div>


                    <div>
                        <button >Get values</button>
                    </div>

                </div>
            </form>

        </div>

    </div>
</template>

<script>
    import CKEditor from '@ckeditor/ckeditor5-vue'
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor'
    import Multiselect from 'vue-multiselect'




    export default {
        name: "NewPost",
        components: {
            ckeditor: CKEditor.component,
            Multiselect,
        },


        mounted() {
          this.uploadImageLink = this.generateLink('post_image_upload');
        },


        data() {
            return {
                uploadImages: [],
                editor: ClassicEditor,
                value: null,
                options: [
                    { name: 'Vue.js', id: '1' },
                    { name: 'Rails', id: 2 },
                    { name: 'Sinatra', id: 3 },
                    { name: 'Laravel', id: 4 },
                    { name: 'Phoenix', id: 5 }
                ],
                //the form data
                title: '',
                mainText: '',
                postCategories: [],
                uploadImageLink : '',
            };
        },


        methods: {

            onFileChanged (event) {
                const file = event.target.files[0];
                let fileReader = new FileReader();
                console.log(file)
                let image = URL.createObjectURL(file);
                this.uploadImages.push(image);
            },

            uploadImageSubmit: function(images){

            },

            checkFormErrors: function(){
                this.errors = [];

                if(!this.title) this.errors.push('Please, enter the title');
                if(!this.postCategories.length) this.errors.push('Please, select category');
                if(!this.mainText) this.errors.push('Please, enter the main post text');
                if(!this.uploadImages) this.errors.push('Please, upload the post image');
                //TODO: call show messages
                return !this.errors.length;
            },

            collectFormData: function (e) {
                if(!this.checkFormErrors()) return false;

                const postData = {
                    name: this.title,
                    body: this.mainText,
                    author_id: 1,
                    categories: this.postCategories.map(category => category.id),
                    post_image: this.uploadImages[0],
                }

                console.log('aafgfafasafsafs')

                this.apiRequest('post_new', postData, { method: 'POST' })
                    .then(response => response.json())
                    .then(response => console.log(response));

                return true;
            },
        }
    }
</script>

<style scoped lang="scss">

    .upload-image {

        &__btn {
            display: flex;
            justify-content: center;
        }


        &__btn > button {
            background: #2a2a2a;
            color: #fff;
            border: 2px solid #2b87b8;
            height: 40px;
            border-radius: 11px
        }

        &__container {
            background: #2a2a2a;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
        }

        &__item {
            margin: 10px;
            border: 4px solid #fff;
            box-shadow: 0 0 10px #d8b3b3;
        }

    }

</style>