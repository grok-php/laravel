# **Contributing to Grok AI Laravel**

Thank you for considering contributing to **Grok AI Laravel**.  
This guide outlines how you can help improve the package and collaborate effectively.

---

## **Table of Contents**
- [Getting Started](#getting-started)
- [Reporting Bugs](#reporting-bugs)
- [Feature Requests](#feature-requests)
- [Development Workflow](#development-workflow)
- [Running Tests](#running-tests)
- [Acknowledgements](#acknowledgements)

---

## **Getting Started**

### 1. Fork the Repository
Click the **"Fork"** button at the top right of this repository to create your copy.

### 2. Clone Your Fork
```sh
git clone https://github.com/your-username/laravel-grok.git
cd laravel-grok
```

### 3. Install Dependencies
```sh
composer install
```

### 4. Link Your Local Package
If you're testing this package inside a Laravel project, use:

```sh
composer remove grok-php/laravel
composer require grok-php/laravel:@dev --prefer-source
```

---

## **Reporting Bugs**
If you find a bug, please [open an issue](https://github.com/grok-php/laravel/issues) and include:

- A clear description of the issue.
- Steps to reproduce the problem.
- Expected vs. actual behavior.
- Any error messages or logs.
- Laravel and PHP versions used.

Providing as much detail as possible helps resolve the issue faster.

---

## **Feature Requests**
If you have an idea for improving the package, [submit a feature request](https://github.com/grok-php/laravel/issues) including:

- A detailed explanation of the proposed feature.
- The problem it solves.
- Example use cases.

Well-documented proposals have a higher chance of being implemented.

---

## **Development Workflow**

### 1. Create a New Branch
Before making changes, create a new branch:

```sh
git checkout -b feature/your-feature-name
```

### 2. Implement Your Changes
- Follow **PSR-12** coding standards.
- Use **typed properties, enums, and traits** where applicable.
- Add PHPDoc comments for better readability.
- Ensure backward compatibility.

### 3. Run Tests Before Committing
```sh
composer test
```

### 4. Commit Your Changes
```sh
git add .
git commit -m "Add feature X"
```

### 5. Push to Your Fork
```sh
git push origin feature/your-feature-name
```

### 6. Open a Pull Request
- Navigate to [Grok AI Laravel Pull Requests](https://github.com/grok-php/laravel/pulls).
- Click "New Pull Request", select your branch, and submit.

A clear and well-documented PR speeds up the review process.

---

## **Running Tests**
We use **PHPUnit** for testing. Before running tests, copy the PHPUnit configuration file:

```sh
cp phpunit.xml.dist phpunit.xml
```

Then, update your API key inside `phpunit.xml`:

```xml
<php>
    <env name="GROK_API_KEY" value="your-api-key-here"/>
</php>
```

Once configured, run the tests:

```sh
composer test
```
or
```sh
vendor/bin/phpunit
```

Ensure all tests pass before submitting a PR.

---

## **Acknowledgements**
Your contributions help make **Grok AI Laravel** better for the Laravel community.  
Thank you for taking the time to improve this package.
