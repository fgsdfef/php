<?php

abstract class Animal
{
    protected string $name;
    protected int $age;
    protected string $species;

    public function __construct(string $name, int $age, string $species)
    {
        $this->name = $name;
        $this->age = $age;
        $this->species = $species;
    }

    abstract public function makeSound(): void;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }
}

class Dog extends Animal
{
    private string $breed;

    public function __construct(string $name, int $age, string $breed)
    {
        parent::__construct($name, $age, "Dog");
        $this->breed = $breed;
    }

    public function makeSound(): void
    {
        echo "{$this->name} говорит: Гав-гав!<br>";
    }
}

class Cat extends Animal
{
    private string $color;

    public function __construct(string $name, int $age, string $color)
    {
        parent::__construct($name, $age, "Cat");
        $this->color = $color;
    }

    public function makeSound(): void
    {
        echo "{$this->name} говорит: Мяу!<br>";
    }
}

class Zoo
{
    private array $animals = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function listAnimals(): void
    {
        echo "<b>Животные в зоопарке:</b><br>";
        foreach ($this->animals as $animal) {
            echo "Имя: {$animal->getName()}, 
                  Вид: {$animal->getSpecies()}, 
                  Возраст: {$animal->getAge()}<br>";
        }
        echo "<br>";
    }

    public function animalSounds(): void
    {
        echo "<b>Звуки животных:</b><br>";
        foreach ($this->animals as $animal) {
            $animal->makeSound();
        }
    }
}


$dog1 = new Dog("Бобик", 3, "Овчарка");
$dog2 = new Dog("Шарик", 5, "Лабрадор");

$cat1 = new Cat("Мурка", 2, "Белый");
$cat2 = new Cat("Барсик", 4, "Черный");

$zoo = new Zoo();

$zoo->addAnimal($dog1);
$zoo->addAnimal($dog2);
$zoo->addAnimal($cat1);
$zoo->addAnimal($cat2);

$zoo->listAnimals();
$zoo->animalSounds();
