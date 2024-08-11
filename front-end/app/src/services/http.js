import axios from "axios";

const http = axios.create({
  baseURL: "http://localhost/api",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
    Accept: "application/json"
  },
});

const lsUserData = localStorage.getItem('opatuscoAuth')

if (lsUserData) {
  const userData = JSON.parse(lsUserData)

  if (userData?.token) {
    axios.defaults.headers.common['Authorization'] = userData.token;
  }
}

export default http;
