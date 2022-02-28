from typing import Optional
from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

students = [
    {'name': 'Merxhan', 'surname': 'Bajrami', 'index': '56/2020'},
    {'name': 'Egzon', 'surname': 'Sulejmani', 'index': '103/2020'},
    {'name': 'Jeton', 'surname': 'Sapunxhiu', 'index': '21/2020'},
    {'name': 'Festim', 'surname': 'Y', 'index': '121/2020'},
]


class Student(BaseModel):
    name: str
    surname: str
    index: str


@app.get('/students')
def get_all_students():
    return students


@app.get('/students/{student_id}')
def get_student_by_id(student_id: int):
    return students[student_id-1]


@app.post('/students')
def add_new_student(student: Student):
    students.append(student)
    return student


@app.put('/students/{student_id}')
def update_student_details(student_id: int, student: Student):
    s = students[student_id-1]
    s['name'] = student.name
    s['surname'] = student.surname
    s['index'] = student.index
    return student


@app.delete('/students/{student_id}')
def delete_student_by_id(student_id: int):
    students.pop(student_id-1)
    return []
