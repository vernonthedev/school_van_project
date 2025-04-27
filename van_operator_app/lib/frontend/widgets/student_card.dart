import 'package:flutter/material.dart';

import '../screens/student_details.dart';

Widget studentCard({
  required String studentName,
  required BuildContext context,
}) {
  return Card(
    margin: const EdgeInsets.symmetric(vertical: 8, horizontal: 16),
    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
    child: ListTile(
      title: Text(
        studentName,
        style: const TextStyle(fontWeight: FontWeight.bold),
      ),
      trailing: Row(
        mainAxisSize: MainAxisSize.min,
        children: [
          ElevatedButton(
            onPressed: () {
              ScaffoldMessenger.of(
                context,
              ).showSnackBar(SnackBar(content: Text('Picked up $studentName')));
            },
            child: const Text("Pick Up"),
          ),
          const SizedBox(width: 8),
          TextButton(
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder:
                      (ctx) => StudentDetailsScreen(studentName: studentName),
                ),
              );
            },
            child: const Text("View More"),
          ),
        ],
      ),
    ),
  );
}
