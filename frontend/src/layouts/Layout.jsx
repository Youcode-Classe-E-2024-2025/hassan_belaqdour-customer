import { Outlet } from "react-router-dom";

export default function Layout({ children }) {
  return (
    <>
    <header>header</header>

    <main>
        <Outlet/>
        </main>
        <footer>footer</footer>
    </>
  );
}