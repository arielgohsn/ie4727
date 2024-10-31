import { useState } from "react";

import "./App.css";
import signupgif from "././assets/sign_up.gif";

const FormValidationExample = () => {
  const [formData, setFormData] = useState({
    username: "",
    email: "",
    password: "",
    confirmPassword: "",
  });
  const [label, SetLabel] = useState('Submit')
  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };
  const emailValidation = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  const handleMouseEnter = () => {
    SetLabel("Are you sure?");
  }
  const handleMouseLeave =() => {
    SetLabel("Submit");
  }

  const handleSubmit = (e) => {
    e.preventDefault();
    const validationErrors = {};
    if (!formData.username.trim()) {
      validationErrors.username = "username is required";
    }
    if (!formData.email.trim()) {
      validationErrors.email = "email is required";
    } else if (!emailValidation.test(formData.email)) {
      validationErrors.email = "email is invalid";
    }
    if (!formData.password.trim()) {
      validationErrors.password = "password is required";
    } else if (formData.password.length < 6) {
      validationErrors.password = "password should be at least 6 characters";
    }
    if (!formData.confirmPassword.trim()) {
      validationErrors.confirmPassword = "this field should not be empty";
    }
    if (formData.confirmPassword != formData.password) {
      validationErrors.confirmPassword = "passwords do not match";
    }

    setErrors(validationErrors);

    if (Object.keys(validationErrors).length == 0) {
      alert("Form Submitted Successfully");
    }
  };

  return (
    <>
    <img src={signupgif} class="leftcolumn"/>
    <form onSubmit={handleSubmit} class='rightcolumn'>
      <div>
        <label>Username:</label>
        <input
          type="text"
          name="username"
          placeholder="username"
          autoComplete="off"
          onChange={handleChange}
        />
        {errors.username && <span>{errors.username}</span>}
      </div>
      <div>
        <label>Email:</label>
        <input
          type="email"
          name="email"
          placeholder="example@gmail.com"
          autoComplete="off"
          onChange={handleChange}
        />
        {errors.email && <span>{errors.email}</span>}
      </div>
      <div>
        <label>Password:</label>
        <input
          type="password"
          name="password"
          placeholder="******"
          autoComplete="off"
          onChange={handleChange}
        />
        {errors.password && <span>{errors.password}</span>}
      </div>
      <div>
        <label>Confirm Password:</label>
        <input
          type="password"
          name="confirmPassword"
          placeholder="******"
          autoComplete="off"
          onChange={handleChange}
        />
        {errors.confirmPassword && <span>{errors.confirmPassword}</span>}
      </div>
      <button type="submit" onMouseEnter={handleMouseEnter} onMouseLeave={handleMouseLeave}>
        {label}
        </button>
    </form>
    </>
  );
};
export default FormValidationExample;
