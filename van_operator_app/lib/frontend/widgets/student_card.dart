import 'package:flutter/material.dart';

Widget studentCard({
  required String studentName,
  required BuildContext context,
}) {
  return Card(
    margin: EdgeInsets.symmetric(vertical: 8),
    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
    child: ListTile(
      title: Text(studentName, style: TextStyle(fontWeight: FontWeight.bold)),
      trailing: ElevatedButton(
        onPressed: () {
          //  pickup action
          ScaffoldMessenger.of(
            context,
          ).showSnackBar(SnackBar(content: Text('Picked up $studentName')));
        },
        child: Text("Pick Up"),
      ),
    ),
  );
}
