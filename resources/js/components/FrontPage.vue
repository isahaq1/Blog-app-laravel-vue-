<template>
<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">iSocial</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item active"><a href="index.html" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Blog Home
                    </a></li>
                  
                    <li class="tm-nav-item"><a href="contact.html" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
               What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
                       
            <div class="row tm-row">
                <article class="col-12 col-md-6 tm-post"  v-for="(pst, index) in posts"
          :key="index">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            
                            <img :src="'/blog-app/storage/app/'+pst.blog_banner" alt="image" class="img-fluid" />                            
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{ pst.name }}</h2>
                    </a>                    
                    <p class="tm-pt-30">
                       {{ pst.blog_body }}
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Created At</span>
                        <span class="tm-color-primary">{{ pst.created_at }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span> {{ pst.tag }}</span>
                        <span>{{ pst.category }}</span>
                    </div>
                </article>
                
         
           
          
         
            </div>
                       
            <footer class="row tm-row">
                <hr class="col-12">
                <div class="col-md-6 col-12 tm-color-gray">
                    Design: 
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    iSocial@copyright
                </div>
            </footer>
        </main>
    </div>
</template>
<script>

import DataService from "../services/DataService";

export default {
  name: "post-list",
  data() {
    return {
      posts: [],
      title: ""
    };
  },
  methods: {
    retrievePosts() {
      DataService.getAll()
        .then(response => {
          this.posts = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },


  
  },
  mounted() {
    this.retrievePosts();
  }
};
</script>