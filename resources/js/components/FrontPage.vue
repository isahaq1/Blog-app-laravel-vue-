
<template>

    <div class="container-fluid">
        
        <main class="tm-main">
            <!-- Search form -->
                       
            <div class="row tm-row">
                <h1>Frontend From Vue</h1>
                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="(pst, index) in posts"
          :key="index">
                            <td>{{ pst.name }}</td>
                            <td>{{ pst.blog_body }}</td>
                            <td>{{ pst.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
               
          
         
            </div>
                       
    
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