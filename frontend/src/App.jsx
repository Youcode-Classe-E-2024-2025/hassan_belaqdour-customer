import {router} from "./router/index.jsx";
import { useState } from 'react'
import './App.css'
import { RouterProvider } from "react-router-dom";

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
    <RouterProvider router={router} /> 
    </>
  )
}

export default App
