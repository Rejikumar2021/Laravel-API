import Logo from "../assets/logo.webp";
import { useForm } from "@inertiajs/react";

export default function Login() {
    const { data, setData, post, processing, errors } = useForm({
        email: "",
        password: "",
    });
    const submit = (e) => {
        e.preventDefault();
        post("/");
    };
    return (
        <>
            <div className="min-h-screen w-full grid place-items-center">
                <div className="min-w-120">
                    <img
                        src={Logo}
                        alt="logo"
                        className="max-w-25 m-auto block"
                    />
                    <div>
                        <h2 className="text-center text-2xl font-bold py-3">
                            Welcome back!
                        </h2>

                        <p className="mb-8 text-center">
                            Don't have an account yet?
                            <a href="/register" className="pl-5 text-blue-500">
                                Sign up now
                            </a>
                        </p>
                    </div>
                    {errors.invalidUser && (
                        <div className="text-white text-[14px] w-full bg-red-600 p-2 rounded mb-5">
                            {errors.invalidUser}
                        </div>
                    )}

                    <form action="#" method="post" onSubmit={submit}>
                        <div className="mb-3">
                            <input
                                type="email"
                                placeholder="Email"
                                value={data.email}
                                onChange={(e) =>
                                    setData("email", e.target.value)
                                }
                                id="user-email"
                                autoComplete="off"
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />

                            {errors.email && (
                                <div className="text-red-500 text-[14px] w-full">
                                    {errors.email}
                                </div>
                            )}
                        </div>
                        <div className="mb-8 w-full">
                            <input
                                type="password"
                                placeholder="Password"
                                id="user-password"
                                value={data.password}
                                onChange={(e) =>
                                    setData("password", e.target.value)
                                }
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />
                            {errors.password && (
                                <div className="text-red-500 text-[14px] w-full">
                                    {errors.password}
                                </div>
                            )}
                        </div>

                        <div className="flex justify-between">
                            <div className="text-[15px]">
                                <input type="checkbox" className="mr-2" />
                                Remember me
                            </div>
                            <div className="text-[15px]">
                                <a href="#" className="text-blue-500">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <div className="text-center pt-8">
                            <input
                                type="submit"
                                value="Log In"
                                className="px-10 py-2 bg-blue-600 text-white rounded cursor-pointer"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </>
    );
}
