import { useEffect } from "react";
import { ToastContainer, toast } from "react-toastify";
import Logo from "../assets/logo.webp";
import { useForm, usePage } from "@inertiajs/react";

const Register = () => {
    const { success, error } = usePage().props;
    const { data, setData, post, processing, errors } = useForm({
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        password_confirmation: "",
        acceptTerms: "",
    });
    const submit = (e) => {
        e.preventDefault();
        post("/register");
    };
    useEffect(() => {
        if (success != null) {
            toast(success);
        }
    }, [success, error]);

    return (
        <>
            <ToastContainer />
            <div className="min-h-screen w-full grid place-items-center">
                <div className="sm:min-w-160 mx-2 sm:mx-0">
                    <img
                        src={Logo}
                        alt="logo"
                        className="max-w-25 m-auto block"
                    />
                    <div>
                        <h2 className="text-center text-2xl font-bold py-5">
                            Signup
                        </h2>
                        <ul>
                            {Object.keys(errors).length > 0 && (
                                <div className="alert alert-danger">
                                    <ul>
                                        {Object.entries(errors).map(
                                            ([key, message]) => (
                                                <li
                                                    className="block text-red-600 text-[14px]"
                                                    key={key}
                                                >
                                                    {message}
                                                </li>
                                            ),
                                        )}
                                    </ul>
                                </div>
                            )}
                        </ul>
                    </div>
                    <form action="" method="post" onSubmit={submit}>
                        <div className="sm:mb-3 sm:flex sm:gap-3">
                            <input
                                type="text"
                                placeholder="First Name"
                                value={data.firstName}
                                onChange={(e) =>
                                    setData("firstName", e.target.value)
                                }
                                id="firstName"
                                autoComplete="off"
                                required="required"
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />
                            <input
                                type="text"
                                placeholder="Last Name"
                                value={data.lastName}
                                onChange={(e) =>
                                    setData("lastName", e.target.value)
                                }
                                id="lastName"
                                autoComplete="off"
                                required="required"
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />
                        </div>
                        <div className="sm:mb-3">
                            <input
                                type="email"
                                placeholder="Email"
                                value={data.email}
                                required="required"
                                onChange={(e) =>
                                    setData("email", e.target.value)
                                }
                                id="email"
                                autoComplete="off"
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />
                        </div>
                        <div className="mb-3 sm:flex sm:gap-3">
                            <input
                                type="password"
                                placeholder="Password"
                                value={data.password}
                                required="required"
                                onChange={(e) =>
                                    setData("password", e.target.value)
                                }
                                id="password"
                                autoComplete="off"
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />
                            <input
                                type="password"
                                placeholder="Confirm password"
                                value={data.password_confirmation}
                                required="required"
                                onChange={(e) =>
                                    setData(
                                        "password_confirmation",
                                        e.target.value,
                                    )
                                }
                                id="password_confirmation"
                                autoComplete="off"
                                className="border border-[#ddd] w-full rounded-md px-4 py-2.5 outline-none font-sans text-sm placeholder:text-gray-400 focus:border-black focus:ring-1 focus:ring-black my-1.5"
                            />
                        </div>
                        <div className="mb-3 sm:flex sm:gap-3">
                            <input
                                type="checkbox"
                                name="acceptTerms"
                                id="acceptTerms"
                                required="required"
                                className="mr-2 sm:mr-0"
                            />
                            I accept
                            <a href="#" className="text-blue-700">
                                Terms and conditions
                            </a>
                        </div>
                        <div className="mt-5 sm:flex sm:gap-3 justify-center">
                            <button
                                type="submit"
                                className="border py-2 px-15 rounded border-green-800 hover:bg-green-800 hover:text-white cursor-pointer"
                            >
                                Create Account
                            </button>
                        </div>
                        <p className="mt-5 text-black">
                            Already have an account?{" "}
                            <span className="text-blue-600">
                                <a href="/">Sign in</a>
                            </span>
                        </p>
                    </form>
                </div>
            </div>
        </>
    );
};
export default Register;
