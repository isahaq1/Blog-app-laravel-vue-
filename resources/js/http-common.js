import axios from "axios";

export default axios.create({
  baseURL: "http://localhost/blog-app/",
  headers: {
    "Content-type": "application/json"
  }
})