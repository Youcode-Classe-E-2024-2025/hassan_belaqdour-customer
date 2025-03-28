import { createBrowserRouter} from "react-router-dom"; 
import Login from "../pages/Login.jsx";
import Register from "../pages/Register.jsx";
import Home from "../pages/Home.jsx";
import Layout from "../layouts/Layout.jsx";

export const router = createBrowserRouter([
    {element: <Layout/>,
        children: [
            {path: "/", element: <Home/>},
            {path: "/login", element: <Login/>},
            {path: "/register", element: <Register/>},
        ]
    }
    ])