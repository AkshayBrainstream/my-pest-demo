TDD, or Test-Driven Development, is a software development approach where tests are written before the code itself, guiding the design and implementation of features.

The main purposes of using TDD in software development are:

Improves Code Quality: Writing tests first helps ensure the code meets its requirements before implementation.
Reduces Bugs: Early testing catches errors and bugs before they become embedded in the codebase.
Guides Design: Forces developers to consider the design and structure of their code from the outset, leading to cleaner, more modular architectures.
Facilitates Refactoring: With a comprehensive test suite, developers can refactor code with confidence, knowing their changes haven't broken existing functionality.
Enhances Documentation: Tests act as living documentation, clearly describing what the code is supposed to do.
Encourages Simple Solutions: Promotes writing only the necessary code to pass tests, often leading to simpler, more efficient implementations.
Improves Developer Confidence: Developers can make changes or add features with assurance, as the test suite helps verify the application still works as expected.
Speeds Up the Development Process: Although it may seem counterintuitive, over time, TDD can speed up development by reducing the time spent on debugging and fixing errors.
Facilitates Agile and Iterative Development: TDD fits well with agile development practices, supporting frequent iterations and continuous improvement.
Promotes Better Understanding: Writing tests first requires developers to thoroughly understand the feature's requirements and constraints before starting implementation.

Pest PHP offers a wide range of expect functions for making assertions in your tests. These functions are intuitive and readable, making your tests easy to understand and write. Here's a list of some commonly used toBe and related expectation functions available in Pest:

**Install steps:**
Composer Install
run command to test full project : ./vendor/bin/pest
run command to test folder : ./vendor/bin/pest tests/Unit
run command to test full project : ./vendor/bin/pest tests/Unit/TaxCalculatorTest.php 

toBe($value): Asserts that the value is exactly the same as $value.

toBeTrue(): Asserts that the value is true.

toBeFalse(): Asserts that the value is false.

toBeNull(): Asserts that the value is null.

toBeArray(): Asserts that the value is an array.

toBeString(): Asserts that the value is a string.

toBeInt(): Asserts that the value is an integer.

toBeFloat(): Asserts that the value is a float.

toBeNumeric(): Asserts that the value is numeric.

toBeObject(): Asserts that the value is an object.

toBeInstanceOf($class): Asserts that the object is an instance of $class.

toBeGreaterThan($value): Asserts that the value is greater than $value.

toBeGreaterThanOrEqual($value): Asserts that the value is greater than or equal to $value.

toBeLessThan($value): Asserts that the value is less than $value.

toBeLessThanOrEqual($value): Asserts that the value is less than or equal to $value.

toEqual($value): Asserts that the value is equal to $value, using equality comparison.

toMatchArray($array): Asserts that the array matches the given $array.

toHaveKey($key): Asserts that an array has a specified $key.

toContain($value): Asserts that the value is contained within the array.

toHaveCount($count): Asserts that the count of items in an array or countable object is $count.

toThrow($exception, $message = null): Asserts that the closure throws an exception. Optionally checks if the thrown exception message matches $message.

toMatch($pattern): Asserts that the value matches a given regular expression pattern.

toStartWith($value): Asserts that a string starts with a specified value.

toEndWith($value): Asserts that a string ends with a specified value.

toHaveLength($length): Asserts that the value (a string or an array) has a specific length.

toBeJson(): Asserts that the value is a valid JSON string.

toBeEmpty(): Asserts that the value is empty.

toHaveProperty($property, $value = null): Asserts that an object has a specified property. Optionally checks if the property's value matches the provided value.

toInclude($value): An alias for toContain(), asserts that the collection includes the specified value.

toHaveKeys($keys): Asserts that an array has all of the specified keys.

toBeOneOf($values): Asserts that the value is one of the provided values.

toSatisfy($callback): Asserts that the value passes a custom condition defined in a callback.

toHaveCount($count): Asserts that the countable value has a specified count.

toHaveValue($value): Asserts that an array has a specified value.

toThrowWithMessage($exception, $message): Asserts that the closure throws a specific exception with a specific message.

not()->: A modifier that can be used before any expectation to assert the opposite. For example, expect($value)->not()->toBeTrue() asserts that $value is not true.

each($callback): Applies a given expectation to each element in an array or collection.

sequence(...$callbacks): Allows asserting a sequence of expectations on an array or collection, where each callback is applied to the corresponding element.

and($value): Allows chaining another value to apply expectations on, without restarting the expectation chain.

toBeInstanceOf(Closure::class): Asserts that the given closure or anonymous function is an instance of the Closure class