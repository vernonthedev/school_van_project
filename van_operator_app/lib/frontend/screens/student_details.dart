import 'package:flutter/material.dart';

class StudentDetailsScreen extends Widget {
  final String studentName;

  const StudentDetailsScreen({super.key, required this.studentName});

  @override
  Element createElement() {
    return StatelessElement(_StudentDetailsContent(studentName: studentName));
  }
}

class _StudentDetailsContent extends StatelessWidget {
  final String studentName;

  const _StudentDetailsContent({required this.studentName});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Student Details")),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              "Student Information",
              style: Theme.of(context).textTheme.titleLarge,
            ),
            const SizedBox(height: 10),
            Text("Name: $studentName"),
            Text("Class: Primary 3"),
            Text("Age: 9 years"),
            const SizedBox(height: 20),
            Text(
              "Parent Information",
              style: Theme.of(context).textTheme.titleLarge,
            ),
            const SizedBox(height: 10),
            Text("Parent Name: Mr. John Doe"),
            Text("Phone: +256 700 123 456"),
            Text("Address: Kampala"),
            const Spacer(),
            Center(
              child: ElevatedButton(
                onPressed: () {
                  ScaffoldMessenger.of(context).showSnackBar(
                    const SnackBar(
                      content: Text('Student picked up successfully!'),
                    ),
                  );
                },
                child: const Text("Pick Up"),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
