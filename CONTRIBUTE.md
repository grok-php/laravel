# 🛠 Contributing to Grok AI Laravel

First off, thanks for taking the time to contribute! 🎉  
This guide outlines how you can help improve **Grok AI Laravel** and collaborate effectively.

---

## 📖 Table of Contents
- [🚀 Getting Started](#-getting-started)
- [🐛 Reporting Bugs](#-reporting-bugs)
- [✨ Feature Requests](#-feature-requests)
- [🛠 Development Workflow](#-development-workflow)
- [🧪 Running Tests](#-running-tests)
- [🙌 Acknowledgements](#-acknowledgements)

---

## 🚀 Getting Started

### 1️⃣ Fork the Repository
Click the **"Fork"** button at the top right of this repository to create your copy.

### 2️⃣ Clone Your Fork
```sh
git clone https://github.com/your-username/laravel-grok.git
cd laravel-grok
```

### 3️⃣ Install Dependencies

```sh
composer install
```

### 4️⃣ Link Your Local Package
If you're testing this package inside a Laravel project, you may use:

```sh
composer remove grok-php/laravel
composer require grok-php/laravel:@dev --prefer-source
```

---

## 🐛 Reporting Bugs
Found a bug? Please [open an issue](https://github.com/grok-php/laravel/issues) and include:

- A clear description of the bug.
- Steps to reproduce the issue.
- The expected vs. actual behavior.
- Any error messages or logs.
- Your Laravel and PHP version.

---

## ✨ Feature Requests
Have an idea? We'd love to hear it!
Submit a [feature request](https://github.com/grok-php/laravel/issues) with:

- A detailed explanation of your proposed feature.
- The problem it solves.
- Example use cases.

---

## 🛠 Development Workflow

1- Create a new branch for your feature or fix:

```sh
git checkout -b feature/your-new-feature
```

2- Make Your Changes & Add Tests
- Follow PSR-12 coding standards.
- Use typed properties, enums, and traits.
- Document your functions with PHPDoc.
- Always write unit tests for new features.

3- Run tests before committing:

```sh
composer test
```
4- Commit Your Changes

```sh
git add .
git commit -m "✨ Added new feature X"
```

7- Push to Your Fork

```sh
git push origin feature/your-new-feature
```

6- Open a Pull Request (PR)
- Go to [Grok PHP Client Repo](https://github.com/grok-php/laravel/pulls)
- Click "New Pull Request", select your branch, and submit 🚀

---

## 🧪 Running Tests
We use PHPUnit for testing. Before submitting your PR, run:

```sh
composer test
or
vendor/bin/phpunit
```

## 🙌 Acknowledgements
A huge thank you to everyone contributing! ❤️ Your efforts help improve this package for the entire Laravel community.

🚀 Happy coding!