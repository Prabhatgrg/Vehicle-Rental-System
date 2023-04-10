import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Login, Signup } from "./pages";
import { Header, Footer } from "./components";
import { DefaultLayout } from "./layout";

function App() {
    return (
        <BrowserRouter>
            <Header />

            <Routes>
                <Route path="/login" element={<Login />} />
                <Route path="/signup" element={<Signup />} />
                <Route path="*" element={<DefaultLayout />} />
            </Routes>

            <Footer />
        </BrowserRouter>
    );
}

export default App;
