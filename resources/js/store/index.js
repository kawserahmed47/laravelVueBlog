import axios from "axios";

export default {
    state:{
        category:[],
        posts:[],
    },
    getters:{
        getCategory(state){
            return state.category;
        },

        getPost(state){
            return state.posts;
        }

    },
    actions:{
        getAllCategory(context){    
            axios.get('/api/category' ).then((response)=>{
                console.log(response.data);
                context.commit('categories', response.data);
            })
        },

        getallPost(context){    
            axios.get('/api/post' ).then((response)=>{
                console.log(response.data);
                context.commit('posts', response.data);
            })
        }

    },
    mutations:{
        categories(state, data){
            return state.category = data;
        },
        posts(state, data){
            return state.posts = data;
        }

    }
}