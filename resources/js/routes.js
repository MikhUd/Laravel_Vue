import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import Dashboard from './components/Dashboard';
import About from './components/About';
import NotFound from './components/NotFound';
import Postmaker from './components/Postmaker';
import CheckPosts from './components/CheckPosts';
import Post from './components/Post';


export default{
    mode: 'history',
    linkActiveClass: 'font-semibold',
    routes:[  
        {
            path: '*',
            component: NotFound
        },
        {
            path: '/login',
            component: Login,
            name:'Login'

        },
        {
            path: '/register',
            component: Register
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'Dashboard',
            beforeEnter:(to, form, next)=>{
                axios.get('/api/authentication').then(()=>{  //Проверяем авторизован ли чел, для этого в api.php создаем дополнительный роут с Middleware(доступен только авторизованным), в нем возвращаем тру, то есть если пользователь авторизован то сюда придет ответ true 
                    //и мы вызовем функцию next она позволит перейти на dashboard, если же пользователь не авторизован он будет перенаправлен на страницу логина
                    next()
                }).catch(()=>{
                    return next({name: 'Login'})
                })
            }
        },
        {
            path: '/',
            component: Home,
            name: 'Home'
        },
        {
            path: '/about',
            component: About
        },
        {
            path: '/postmaker',
            component: Postmaker
        },
        {
            path: '/checkposts',
            component: CheckPosts,
            name: 'CheckPosts',
            beforeEnter:(to, form, next)=>{
                axios.get('/api/authentication').then(()=>{  //Проверяем авторизован ли чел, для этого в api.php создаем дополнительный роут с Middleware(доступен только авторизованным), в нем возвращаем тру, то есть если пользователь авторизован то сюда придет ответ true 
                    //и мы вызовем функцию next она позволит перейти на dashboard, если же пользователь не авторизован он будет перенаправлен на страницу логина
                    next()
                }).catch(()=>{
                    return next({name: 'Login'})
                })
            }
        },
        {
            path: '/post/{id}',
            component: Post,
            
            beforeEnter:(to, form, next)=>{
                axios.get('/api/post/{id}'), then(()=>{
                    next()
                }).catch(()=>{
                    return next({name : 'Login'})
                })
            }

        }

    ]
}