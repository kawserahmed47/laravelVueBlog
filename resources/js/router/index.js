
import Dashboard from '../components/admin/Dashboard.vue';
import Category from '../components/category/Category.vue';
import AddCategory from '../components/category/AddCategory.vue';
import EditCategory from '../components/category/EditCategory.vue';

import Post from '../components/post/Post.vue';
import AddPost from '../components/post/AddPost.vue'
import EditPost from '../components/post/EditPost.vue'

import Blog from '../components/Home/Blog.vue'
import SingleBlog from '../components/Home/SingleBlog.vue'
export const routes = [

    { 
        path: '/',
        name: 'Blog',
        component: Blog
    
    },

    { 
        path: '/blog-details/:id',
        name: 'SingleBlog',
        component: SingleBlog
    
    },

    { 
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard
    
    },
    { 
        path: '/category',
        name: 'Category',
        component: Category
    
    },
    {
        path: '/add-category',
        name: 'AddCategory',
        component: AddCategory
    },
    {
        path: '/edit-category/:id',
        name: 'EditCategory',
        component: EditCategory
    },
    { 
        path: '/post',
        name: 'Post',
        component: Post
    
    },

    { 
        path: '/add-post',
        name: 'AddPost',
        component: AddPost
    
    },
    { 
        path: '/edit-post/:id',
        name: 'EditPost',
        component: EditPost
    
    },
]