#State Machine kata

In order to manage the state of an article in production, is a state machine to be programmed.

Two items have been established:
* Framed Poster
* Custom glass plate

Both products can be ordered with and without "gift wrapping".

The production of "framed print" includes the following states:
* 1. ordered
* 2. printed
* 3. sliced
* 4. framed
* 5. gift-wrapped (optional)
* 6. shipped

The production of "Printed glass plate" includes the following states:
* 1. ordered
* 2. printed
* 3. gift-wrapped (optional)
* 4. shipped

It is important that the correct order of the states is ensured by the state machine.

The products are transported manually by one step to another, which makes it possible that an article giving an incomplete state.
Here it is expected that the state machine outputs an error message with the expected state.
Such errors are already provided in the file run.php.

requirements:
* To implement any framework / library to be used.
* There is no graphical user interface is required (A CLI program is sufficient).
* On products should be comprehensible when (exact time) has occurred which state.
* If an unexpected condition is confirmed, should an error message may result.
* The state machine should be expandable, so that a new state between existing states can be inserted easily.
* To implement the provided source code must be used as a base. This may be extended at any point.
* The run.php file serves as a basis for testing the state machine.