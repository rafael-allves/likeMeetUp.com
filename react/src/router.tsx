import { createBrowserRouter } from "react-router-dom";
import Auth from './views/users/auth.tsx'

const router = createBrowserRouter([
    {
        path: 'auth',
        element: <Auth />
    }
])

export default router;