<template>
  <div id="app">
    <div class="container">
      <div class="card">
        <p class="title">Todo List</p>
        <div class="todo">
          <div class="flex between">
            <input v-model="newContent" type="text" class="input-add" />
            <button @click="insertTodoList" class="button-add">追加</button>
          </div>
          <div v-for="item in todoLists" class="flex between" :key="item.id">
            <input v-model="content" type="text" class="input-update" />
            <div>
              <button
                @click="updateTodoList(item.id, item.content)"
                class="button-update"
              >
                更新
              </button>
              <button @click="deleteTodoList(item.id)" class="button-delete">
                削除
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      newContent: "",
      todoLists: [],
    };
  },
  methods: {
    async getTodoList() {
      const resData = await axios.get("http://127.0.0.1:8000/api/content/");
      this.todoLists = resData.data.data;
    },
    async insertTodoList() {
      const sendData = {
        content: this.newContent,
      };
      await axios.post("http://127.0.0.1:8000/api/content/", sendData);
      this.getTodoList();
    },
    async updateTodoList(id, content) {
      const sendData = {
        content: content,
      };
      await axios.put("http://127.0.0.1:8000/api/content/" + id, sendData);
      this.getTodoList();
    },
    async deleteTodoList(id) {
      await axios.delete("http://127.0.0.1:8000/api/content/" + id);
      this.getTodoList();
    },
  },
  created() {
    this.getTodoList();
  },
};
</script>

<style>
html,
body,
div,
span,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
abbr,
address,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
samp,
small,
strong,
sub,
sup,
var,
b,
i,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section,
summary,
time,
mark,
audio,
video {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
}

body {
  line-height: 1;
}

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
  display: block;
}

nav ul {
  list-style: none;
}

blockquote,
q {
  quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
  content: "";
  content: none;
}

a {
  margin: 0;
  padding: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
}

/* change colours to suit your needs */
ins {
  background-color: #ff9;
  color: #000;
  text-decoration: none;
}

/* change colours to suit your needs */
mark {
  background-color: #ff9;
  color: #000;
  font-style: italic;
  font-weight: bold;
}

del {
  text-decoration: line-through;
}

abbr[title],
dfn[title] {
  border-bottom: 1px dotted;
  cursor: help;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

/* change border colour to suit your needs */
hr {
  display: block;
  height: 1px;
  border: 0;
  border-top: 1px solid #cccccc;
  margin: 1em 0;
  padding: 0;
}

input,
select {
  vertical-align: middle;
}

html {
  background-color: #15202b;
}
* {
  font-family: "Noto Sans JP";
}

.container {
  background-color: #2d197c;
  height: 100vh;
  width: 100vw;
  position: relative;
}
.card {
  background-color: #fff;
  width: 50vw;
  padding: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 10px;
}
.title {
  font-weight: bold;
  font-size: 24px;
  color: #000;
}
.input-add {
  width: 80%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  font-size: 14px;
  outline: none;
}
.input-update {
  width: 30%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  font-size: 14px;
  outline: none;
}
.button-add {
  text-align: left;
  border: 2px solid #dc70fa;
  font-size: 12px;
  color: #dc70fa;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}
.button-add:hover {
  background-color: #dc70fa;
  border-color: #dc70fa;
  color: #fff;
}
.button-update {
  text-align: left;
  border: 2px solid #fa9770;
  font-size: 12px;
  color: #fa9770;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}
.button-update:hover {
  background-color: #fa9770;
  border-color: #fa9770;
  color: #fff;
}
.button-delete {
  text-align: left;
  border: 2px solid #71fadc;
  font-size: 12px;
  color: #71fadc;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}
.button-delete:hover {
  background-color: #71fadc;
  border-color: #71fadc;
  color: #fff;
}
.flex {
  display: flex;
  justify-content: space-between;
}
</style>
