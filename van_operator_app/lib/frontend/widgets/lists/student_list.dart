import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../../backend/models/trip.dart';
import '../cards/student_card.dart';

class StudentList extends StatelessWidget {
  final TripAssigned trip;

  const StudentList({super.key, required this.trip});

  @override
  Widget build(BuildContext context) {
    // Mock student data
    final students = [
      {'id': 101, 'name': 'John Doe', 'grade': '5th', 'address': '123 Main St'},
      {
        'id': 102,
        'name': 'Jane Smith',
        'grade': '4th',
        'address': '456 Oak Ave',
      },
      {
        'id': 103,
        'name': 'Mike Johnson',
        'grade': '6th',
        'address': '789 Pine Rd',
      },
    ];

    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(
          'Students in Van',
          style: GoogleFonts.poppins(fontSize: 18, fontWeight: FontWeight.w600),
        ),
        const SizedBox(height: 12),
        ...students.map((student) => StudentCard(student: student)),
      ],
    );
  }
}
