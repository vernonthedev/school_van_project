import 'package:flutter/material.dart';
import '../../backend/models/trip.dart' show TripAssigned;
import '../widgets/cards/trip_overview_card.dart';
import '../widgets/lists/student_list.dart';
import '../widgets/buttons/trip_actions.dart';

class TripDetailsScreen extends StatelessWidget {
  final TripAssigned trip;

  const TripDetailsScreen({super.key, required this.trip});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Trip Details - Van #${trip.vanId}')),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            TripOverviewCard(trip: trip),
            const SizedBox(height: 20),
            StudentList(trip: trip),
            const SizedBox(height: 20),
            TripActions(trip: trip),
          ],
        ),
      ),
    );
  }
}
