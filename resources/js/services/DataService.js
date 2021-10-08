import http from "../http-common";

class DataService {
  getAll() {
    return http.get("/postlist");
  }

  
}

export default new DataService();