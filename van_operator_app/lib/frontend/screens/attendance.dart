import 'package:flutter/material.dart';

import '../widgets/student_card.dart';

class AttendanceScreen extends StatelessWidget {
  const AttendanceScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Van Attendance")),
      body: ListView(
        padding: EdgeInsets.all(16),
        children: [
          studentCard(studentName: "John Doe", context: context),
          studentCard(studentName: "Jane Smith", context: context),
          studentCard(studentName: "Alex Johnson", context: context),
          // You can add more StudentCards here
        ],
      ),
    );
  }
}
